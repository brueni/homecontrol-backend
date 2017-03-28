#!/bin/bash
pw=`cat shut_pw`
ssh -t -t brueni@nas3270.home "echo $pw | sudo -S shutdown -h now"
