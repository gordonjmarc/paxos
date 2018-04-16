#!/bin/bash

openssl genrsa -des3 -passout pass:x -out localhost.pass.key 2048
openssl rsa -passin pass:x -in localhost.pass.key -out localhost.key
rm localhost.pass.key
openssl req -new -key localhost.key -out localhost.csr \
    -subj "/C=US/ST=NY/L=Huntington/O=OrgName/OU=IT Department/CN=localhost"
openssl x509 -req -days 365 -in localhost.csr -signkey localhost.key -out localhost.crt
