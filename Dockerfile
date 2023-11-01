FROM php:7.2-cli
WORKDIR /home/vini-devapi/projects/conemb/edi-proceda
COPY . /home/vini-devapi/projects/conemb/edi-proceda/src/Conemb.php
EXPOSE 80
CMD ["php", "Conemb.php" ]