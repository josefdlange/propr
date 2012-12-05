#! /usr/bin/python
import ConfigParser, json, os, random

def main():
    config = ConfigParser.ConfigParser()
    config.readfp(open('data-gen.cfg'))
    tables = []
    for section in config.sections():
        newTable = {}
        newTable = []
        length = 0
        nullCol = None
        for option in config.options(section):
            values = config.get(section, option)
            values = values.replace(', ',',')
            values = values.split(',')
            if option == 'numberofrows':
                length = int(values[0])
            else:
                newTable.append(values)
        tables.append((section, length, newTable))

    sqlTable = ''
    for table in tables:
        tableName = table[0]
        tableLength = table[1]
        columns = table[2]
        numColumns = len(columns)
        sqlTable += 'INSERT INTO `' + tableName + '` VALUES\n'
        for row in range(0,tableLength):
            currentRow = '( '
            for column in range(0, numColumns):
                choice = random.choice(columns[column])
                if choice == 'NULL':
                    currentRow += 'NULL, '
                else:
                    if column == numColumns-1:
                        currentRow += "'" + choice + "' )\n"
                    else:
                        currentRow += "'" + choice + "', "

            sqlTable += currentRow
        sqlTable += '\n'
    sqlFile = open('sql-insert-data.sql', 'w+')
    sqlFile.write(sqlTable)
    sqlFile.close()


if __name__ == "__main__":
    main()
