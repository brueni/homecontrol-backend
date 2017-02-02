#!/bin/sh
cd `dirname $0`

actionfile="/var/nrdylights/actions/next.action"

if [ "$1" != "-" ]
then
	sed1="$1"
        sed -i 1s/.*/$sed1/ $actionfile
fi

if [ "$2" != "-" ]
then
	sed2="$2"
	sed -i 2s/.*/$sed2/ $actionfile
fi

if [ "$3" != "-" ]
then
	sed3="$3"
        sed -i 3s/.*/$sed3/ $actionfile
fi

if [ "$4" != "-" ]
then
        sed4="$4"
        sed -i 4s/.*/$sed4/ $actionfile
fi

