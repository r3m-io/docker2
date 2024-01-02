#!/bin/sh
echo "TERM=xterm-256color" >> ~/.bashrc
echo "mkdir -p /Application/Bin" >> ~/.bashrc
echo "composer install -n" >> ~/.bashrc
echo "cp /Application/vendor/r3m_io/framework/Bin/R3m.php /Application/Bin/R3m.php" >> ~/.bashrc
echo "php /Application/Bin/R3m.php bin app" >> ~/.bashrc
echo "app install r3m_io/boot" >> ~/.bashrc
#echo "app install r3m_io/node" >> ~/.bashrc
#echo "app install r3m_io/route" >> ~/.bashrc
#echo "app install r3m_io/event" >> ~/.bashrc
#echo "app install r3m_io/middleware" >> ~/.bashrc
#echo "app install r3m_io/output_filter" >> ~/.bashrc
#echo "app install r3m_io/config" >> ~/.bashrc
#echo "app install r3m_io/autoload" >> ~/.bashrc
#echo "app install r3m_io/log" >> ~/.bashrc
#echo "app install r3m_io/host" >> ~/.bashrc
#echo "app init --url=/mnt/Vps2/Data/Init/Init" >> ~/.bashrc
echo "chown root:root /Application/start.sh" >> ~/.bashrc
echo "chown root:root /Application/enter.sh" >> ~/.bashrc
echo "chown root:root /Application/install.dev.sh" >> ~/.bashrc
echo "chown root:root /Application/install.prod.sh" >> ~/.bashrc
echo "chown root:root /Application/reinstall.dev.sh" >> ~/.bashrc
echo "chown root:root /Application/reinstall.prod.sh" >> ~/.bashrc
echo "app info all" >> ~/.bashrc
