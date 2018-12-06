#!/bin/bash

sudo systemctl stop lighttpd
sleep 10
lxc-start -n cntnr1
lxc-start -n cntnr2
sudo iptables -t nat -A PREROUTING -i wlan0 -p tcp --dport 80 -j DNAT --to-destination 10.0.3.11:8080
