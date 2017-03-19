#!/bin/sh
cd `dirname $0`

actionfile="/var/nrdylights/actions/next.action"

if [ "$1" = "on" ]; then
	sed -i '1s/.*/static/' $actionfile
	sudo python /var/nrdylights/light.py &
elif [ "$1" = "toggle" ]; then
	if [ -f /var/nrdylights/light.lock ]; then #Check if Lights are running trough lockfile
		sed -i '1s/.*/exit/' $actionfile
	else
		sed -i '1s/.*/static/' $actionfile
	        sudo python /var/nrdylights/light.py &
	fi
else
	sed -i '1s/.*/exit/' $actionfile
fi
