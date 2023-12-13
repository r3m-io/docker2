FROM debian:12.2
WORKDIR /Application

# Update & upgrade
RUN apt-get update && apt-get upgrade -y
RUN apt-get update && apt-get install init bash cron libzip-dev unzip wget nano php -y

# init
COPY ./Docker/Boot/start.php /usr/bin/start
COPY ./Docker/Boot/init /usr/bin/init
RUN chmod +x /usr/bin/init
RUN chmod +x /usr/bin/start

# composer
COPY ./Docker/Packages/composer/composer.phar /usr/bin/composer
RUN chmod +x /usr/bin/composer
RUN chown www-data:www-data /usr/bin/composer
RUN composer self-update

# ffmpeg
#RUN apt-get update && apt-get install ffmpeg -y

RUN apt-get update && apt-get install \
    lsb-release \
    apt-transport-https \
    apt-utils \
    ca-certificates \
    git \
    software-properties-common -y

# ADD sury pacakges for apache2 and php8.2, php8.3
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'

RUN apt-get update && apt-get install apache2 \
    php8.3 \
    php8.3-fpm \
    php8.3-common \
    php8.3-mysqli \
    php8.3-pdo \
    php8.3-gd \
    php8.3-intl \
    php8.3-imap \
    php8.3-sockets \
    php8.3-opcache \
    php8.3-mbstring \
    php8.3-readline \
    php8.3-curl \
    php8.3-zip \
    php8.3-xml \
    libapache2-mod-fcgid -y

COPY . /Application

# Execute start script
RUN chmod +x /Application/start.sh
RUN sh /Application/start.sh
