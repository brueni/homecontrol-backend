#!/bin/bash
pw=`cat shut_pw`
ssh -t -t media@htpc.home "echo $pw | sudo -S shutdown -h now"
