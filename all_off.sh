#!/bin/sh
cd `dirname $0`

if [ "$1" = "later" ]; then
	sleep 10
fi

/var/mystrom-switch/switch.sh mystrom4.home off #Standlampe aus
sleep 1
/var/mystrom-switch/switch.sh mystrom3.home off #Ecklampe aus
sleep 1
/var/mystrom-switch/switch.sh mystrom2.home off #Kugellampe aus
sleep 1
./set_nrdylight.sh off #Ambient aus



