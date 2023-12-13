#!/bin/sh
echo "TERM=xterm-256color" >> ~/.bashrc
echo "mkdir -p /Application/Public" >> ~/.bashrc
echo "mkdir -p /Application/Bin" >> ~/.bashrc
echo "composer install -n" >> ~/.bashrc
echo "cp /Application/vendor/r3m_io/framework/Bin/R3m.php /Application/Bin/R3m.php" >> ~/.bashrc
echo "php /Application/Bin/R3m.php bin r3m" >> ~/.bashrc
echo "r3m install r3m_io/node" >> ~/.bashrc
echo "r3m install r3m_io/event" >> ~/.bashrc
echo "r3m install r3m_io/config" >> ~/.bashrc
echo "r3m install r3m_io/autoload" >> ~/.bashrc
echo "r3m install r3m_io/log" >> ~/.bashrc
echo "r3m install r3m_io/host" >> ~/.bashrc
#echo "wat init --url=/mnt/Vps2/Data/Init/Init" >> ~/.bashrc
echo "chown root:root /Application/start.sh" >> ~/.bashrc
echo "chown root:root /Application/enter.sh" >> ~/.bashrc
echo "chown root:root /Application/install.dev.sh" >> ~/.bashrc
echo "chown root:root /Application/install.prod.sh" >> ~/.bashrc
echo "chown root:root /Application/reinstall.dev.sh" >> ~/.bashrc
echo "chown root:root /Application/reinstall.prod.sh" >> ~/.bashrc
echo "r3m info all" >> ~/.bashrc
