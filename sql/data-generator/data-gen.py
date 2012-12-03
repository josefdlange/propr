#! /usr/bin/python
import random

class SQLFile:
    def __init__(self):
        self.sql = []

    '''
    Reads a file for
        table names delimited with *
        number of items to make delimited with #
        and strings to make items from delimited with -
    '''
    def readVaribleFile(self):
        #name = raw_input('Enter file to draw varibles from: ')
        variblesFile = open('varibles.txt', 'r')
        lines = variblesFile.readlines()
        varibles = []
        varible = []
        for line in lines:
            if line[:1] == '*':
                varible.append(line[1:])
            if line[:1] == '#':
                varible.append(int(line[1:]))
            if line[:1] == '-':
                varible.append(line[1:].split(', '))
                varibles.append((varible[0], varible[1], varible[1:]))
        return varibles

    def generateRows(self, count, varibles):
        rows = []
        for i in range(1, count):
            row = []
            for varible in varibles:
                row.append(random.choice(varible[2]))
            rows.append(tuple(thing))
        return rows

    def formatToSQL(self, lines):
        formatted = []
        for line in lines:
            formatted.append('INSERT INTO ',line[0],' VALUES\n')
            item = '('
            row = line[1:]
            for entry in row:
                item += "'" + entry + "',"
            item += ')\n'
        return formatted

    def generate(self):
        varibles = self.readVaribleFile()
        for varible in varibles:
            generated = self.generateRows(varible[1], varible[2])
            sqlLines.append(tuple(varible[0], generated))
        self.sql = formatToSQL(sqlLines)

    def writeToFile(self):
        contents = ''
        print contents
        print self.sql
        for line in self.sql:
            contents += line
        f = open('data.sql', 'w+')
        f.write(contents)
        f.close()


def main():
    fakeData = SQLFile()
    fakeData.generate()
    fakeData.writeToFile()





if __name__ == "__main__":
    main()
