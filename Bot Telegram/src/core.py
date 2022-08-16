#!/usr/bin/env python
# pylint: disable=C0116,W0613

import logging
from typing import Dict

from telegram import ReplyKeyboardMarkup, Update, ReplyKeyboardRemove, replymarkup
from telegram.ext import (
    Updater,
    CommandHandler,
    MessageHandler,
    Filters,
    ConversationHandler,
    CallbackContext,
)

from conf.settings import TELEGRAM_TOKEN
from conf.api import get_content, get_techer_id

# Enable logging
logging.basicConfig(
    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s', level=logging.INFO
)

logger = logging.getLogger(__name__)

TYPING, TYPING_REPLY, TYPING_CHOICE, CONTINUE = range(4)

reply_keyboard = [
    ['Sim', 'Não']
]

reply_keyboard_menu = [
    ['Informações', 'Horário do docente'],
    ['Acessos', 'Regulamentos'],
    ['Contatos']
]

markup = ReplyKeyboardMarkup(reply_keyboard, one_time_keyboard=True)
markup_menu = ReplyKeyboardMarkup(reply_keyboard_menu, one_time_keyboard=True)

def facts_to_str(user_data: Dict[str, str]) -> str:
    """Helper function for formatting the gathered user info."""
    facts = [f'{key} - {value}' for key, value in user_data.items()]
    return "\n".join(facts).join(['\n', '\n'])


def start(update: Update, context: CallbackContext) -> int:
    """Start the conversation and ask user for input."""
    update.message.reply_text(
        "Por favor, antes de começar digite seu número com DD."
    )

    return TYPING

def regular_choice(update: Update, context: CallbackContext) -> int:
    """Ask the user for info about the selected predefined choice."""
    text = update.message.text
    context.user_data['phone'] = text
    update.message.reply_text(
        f'Seu número {text.lower()} está correto?', 
        reply_markup=markup,
    )

    return TYPING_REPLY

def received_information(update: Update, context: CallbackContext) -> int:
    """Store info provided by user and ask for the next category."""
    phone = context.user_data['phone']
    firstName = update.effective_user.first_name
    try:
        get_techer_id(phone)
        update.message.reply_text(
            f"Olá {firstName}, tudo bem? Meu nome é Sigabot e estou à sua disposição. Por aqui eu consigo ajudar com:",
            reply_markup=markup_menu,
        )

        return TYPING_CHOICE
    except:
        update.message.reply_text(
            f"Número não encontrado! Verifique o cadastrado no sistema web e digite novamente."
        )

        return TYPING

def schedule(update: Update, context: CallbackContext) -> int:
    """Store info provided by user and ask for the next category."""    

    fullName = update.effective_user.full_name
    phone = context.user_data['phone']
    try: 
        id = get_techer_id(phone)
        update.message.reply_text(
            "Horário do professor:"
        )
        context.bot.sendDocument(
            update.effective_chat.id, open(get_content(id, fullName), 'rb')
        )
        update.message.reply_text(
            "Gostaria de continuar?",
            reply_markup=markup,
        )
    except:
        update.message.reply_text(
            "ERRO",
            reply_markup=markup,
        )
    
    return CONTINUE

def informacoes(update: Update, context: CallbackContext) -> int:
    """Store info provided by user and ask for the next category."""

    update.message.reply_text(
        "Calendário acadêmico:"
        "\nhttp://www.fateccarapicuiba.edu.br/calendario-academico/"
        
        "\n\nHorário de funcionamento da Secretaria Acadêmica:"
        "\nhttps://www.google.com/search?q=Horario+de+funcionamento+da+fatec+de+carapicuiba&sxsrf=AOaemvK7TXehl1DhRlAH7-ZTwBKJ_IPVuw%3A1635280122770&ei=-mR4YdOyLojL1sQP_r-dqA0&ved=0ahUKEwjTl82W9ejzAhWIpZUCHf5fB9UQ4dUDCA4&uact=5&oq=Horario+de+funcionamento+da+fatec+de+carapicuiba&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECc6BwgjELADECc6BwgAEEcQsANKBAhBGABQjl1YtWBgqG5oAXACeACAAYIBiAGAApIBAzAuMpgBAKABAcgBCcABAQ&sclient=gws-wiz"
        
        "\n\nGostaria de continuar?",
        reply_markup=markup,
    )
    
    return CONTINUE

def help(update: Update, context: CallbackContext) -> int:
    """Store info provided by user and ask for the next category."""

    update.message.reply_text(
        "Contato da diretoria:"
        "\nhttp://www.fateccarapicuiba.edu.br/setores-administrativos/"

        "\n\nSite da Faculdade:"
        "\nhttp://www.fateccarapicuiba.edu.br/"

        "\n\nAbertura de ordem de serviço de TI:"
        "\nhttps://forms.office.com/Pages/ResponsePage.aspx?id=veJyzyt6g0e96znVewf3b8v6JYBO2vlDkqadiJ2Kjl9UMjNTSk4wMkxJWEsyTUQ4UlMyVFowWEtDOC4u"

        "\n\nTelefones úteis da faculdade:"
        "\n(11) 4184-8404 / (11) 4183-6827"

        "\n\nGostaria de continuar?",
        reply_markup=markup,
    )
    
    return CONTINUE

def Regulamentos(update: Update, context: CallbackContext) -> int:
    """Store info provided by user and ask for the next category."""

    update.message.reply_text(
        "Regulamento da faculdade:"
        "\nhttp://www.fateccarapicuiba.edu.br/wp-content/uploads/2019/01/REGULAMENTO-GRADUACAO-FATECS-2009.pdf"

        "\n\nRegimento da faculdade:"
        "\nhttp://www.fateccarapicuiba.edu.br/wp-content/uploads/2019/01/REGIMENTO-GERAL_NOVO_2016.pdf"

        "\n\nRegime disciplinar discente da Faculdade:"
        "\nhttp://www.fateccarapicuiba.edu.br/wp-content/uploads/2019/02/DELIBERA%C3%87%C3%83O-CEETEPS-39_2017-REGIME-DISCIPLINAR-DISCENTE.pdf"

        "\n\nTutorial de teletrabalho:"
        "\nhttps://www.cps.sp.gov.br/cartilhas-teletrabalho"

        "\n\nGostaria de continuar?",
        reply_markup=markup,
    )
    
    return CONTINUE

def acessos(update: Update, context: CallbackContext) -> int:
    """Store info provided by user and ask for the next category."""

    update.message.reply_text(
        "Acesso ao SIGA:"
        "\nhttp://siga.cps.sp.gov.br/fatec/login.aspx"

        "\n\nAcesso a loja do CPS & Microsoft:"
        "\nhttp://www.fatec.sp.gov.br/view/Default.aspx#"

        "\n\nAcesso e-mail institucional:"
        "\nhttps://login.microsoftonline.com/#"

        "\n\nAcesso ao TEAMS:"
        "\nhttps://teams.microsoft.com/go#"

        "\n\nGostaria de continuar?",
        reply_markup=markup,
    )
    
    return CONTINUE

def finished(update: Update, context: CallbackContext) -> int:
    """Display the gathered info and end the conversation."""
    firstName = update.effective_user.first_name
    update.message.reply_text(
        f"Até logo, {firstName}.\n\nSe você precisar de mais ajuda digite /start.",
        reply_markup=ReplyKeyboardRemove(),
    )

    return ConversationHandler.END


def main() -> None:
    """Run the bot."""
    # Create the Updater and pass it your bot's token.
    updater = Updater(token=TELEGRAM_TOKEN)

    # Get the dispatcher to register handlers
    dispatcher = updater.dispatcher

    # Add conversation handler with the states TYPING, TYPING_CHOICE and TYPING_REPLY
    conv_handler = ConversationHandler(
        entry_points=[CommandHandler('start', start)],
        states={
            TYPING: [
                MessageHandler(
                    Filters.text & ~(Filters.command | Filters.regex('^Done$')), 
                    regular_choice
                )
            ],
            TYPING_REPLY: [
                MessageHandler(
                    Filters.regex('^(Sim)$'), 
                    received_information
                ),
                MessageHandler(
                    Filters.regex('^(Não)$'), 
                    regular_choice
                ),
            ],
            TYPING_CHOICE: [
                MessageHandler(
                    Filters.regex('^(Horário do docente)$'), 
                    schedule
                ),
                MessageHandler(
                    Filters.regex('^(Contatos)$'), 
                    help
                ),
                MessageHandler(
                    Filters.regex('^(Regulamentos)$'), 
                    Regulamentos
                ),
                MessageHandler(
                    Filters.regex('^(Informações)$'), 
                    informacoes
                ),
                MessageHandler(
                    Filters.regex('^(Acessos)$'), 
                    acessos
                ),
            ],
            CONTINUE: [
                MessageHandler(
                    Filters.regex('^(Sim)$'or'^(sim)$'), 
                    received_information
                ),
                MessageHandler(
                    Filters.regex('^(Não)$'or'^(não)$'), 
                    finished
                ),
            ]
        },
        fallbacks=[MessageHandler(Filters.regex('^Done$'), finished)],
    )

    dispatcher.add_handler(conv_handler)

    # Start the Bot
    updater.start_polling()

    # Run the bot until you press Ctrl-C or the process receives SIGINT,
    # SIGTERM or SIGABRT. This should be used most of the time, since
    # start_polling() is non-blocking and will stop the bot gracefully.
    updater.idle()


if __name__ == '__main__':
    main()