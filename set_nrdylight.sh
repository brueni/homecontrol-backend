#!/bin/sh
cd `dirname $0`

actionfile="/var/nrdylights/actions/next.action"

if [ "$1" = "on" ]
then
	sed -i '1s/.*/static/' $actionfile
	sudo python /var/nrdylights/light.py &
else
	sed -i '1s/.*/exit/' $actionfile
fi
