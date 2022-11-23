FROM nginx
COPY ./dist /usr/share/nginx/html
COPY nginx.conf /etc/nginx/conf.d/default.conf
WORKDIR /usr/share/nginx/html

#RUN apt update -y && apt install nano -y apt install iputils-ping -y

EXPOSE 80
#CMD bash -C '/usr/local/apache2/htdocs/shell.sh';'bash'