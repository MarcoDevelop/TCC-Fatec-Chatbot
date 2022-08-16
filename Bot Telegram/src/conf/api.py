import mysql.connector

def write_file(data, filename):
    # Convert binary data to proper format and write it on Hard Disk
    with open(filename, 'wb') as file:
        file.write(data)

def get_techer_id(phone):
    try:
        connection = mysql.connector.connect(host='chatbot.mysql.dbaas.com.br',
                                             database='chatbot',
                                             user='chatbot',
                                             password='chatbot2021')

        cursor = connection.cursor()
        sql_select_query = """SELECT teacher_ID FROM teachers WHERE phone = %s"""
        # set variable in query
        cursor.execute(sql_select_query, (phone,))
        # fetch result
        record = cursor.fetchall()

        return record[0][0]

    except mysql.connector.Error as error:
        print("Failed to get record from MySQL table: {}".format(error))

    finally:
        if connection.is_connected():
            cursor.close()
            connection.close()
            print("MySQL connection is closed")

def get_content(id, fullName):
    try:
        connection = mysql.connector.connect(host='chatbot.mysql.dbaas.com.br',
                                             database='chatbot',
                                             user='chatbot',
                                             password='chatbot2021')

        cursor = connection.cursor()
        sql_select_query = """SELECT content FROM schedule WHERE teacher_ID = %s"""
        # set variable in query
        cursor.execute(sql_select_query, (id,))
        # fetch result
        record = cursor.fetchall()
        file = record[0][0]
        file_path = f'assets/{fullName}.pdf'
        write_file(file, file_path)

        return file_path

    except mysql.connector.Error as error:
        print("Failed to get record from MySQL table: {}".format(error))

    finally:
        if connection.is_connected():
            cursor.close()
            connection.close()
            print("MySQL connection is closed")