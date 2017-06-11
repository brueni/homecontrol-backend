#!/bin/bash
vlc_host="htpc.home:8080";
vlc_auth=":1"; #empty User, '1' as password

vlc_cmd=$1
vlc_arg1=$2

curl -u $vlc_auth http://${vlc_host}/requests/status.xml?command=${vlc_cmd}${vlc_arg1}
