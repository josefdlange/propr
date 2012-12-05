#! /usr/bin/python
import ConfigParser, json, os, random

def main():
    config = ConfigParser.ConfigParser()
    config.readfp(open('data.cfg'))
    tables = []
    for section in config.sections():
        newTable = {}
        for option in config.options(section):
            values = config.get(section, option)
            values = values.replace(' ','')
            values = values.split(',')
            if len(values) == 1:
                newTable['length'] = int(values[0])
            else:
                newTable[option] = values
        tables.append((section,newTable))
    print tables


if __name__ == "__main__":
    main()
