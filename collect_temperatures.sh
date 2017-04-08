#!/bin/bash
cd `dirname $0`

rsync -av /var/www/states/*.xml /var/homecontrol-backend/states/temperatures/xml/
rsync -av /var/www/states/*_h_* /var/homecontrol-backend/states/temperatures/current/
rsync -av /var/www/states/*_t_* /var/homecontrol-backend/states/temperatures/current/
