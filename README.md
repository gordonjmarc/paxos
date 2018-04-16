# paxos

This application is implemented in PHP 7.1 using Laravel 5.6, Redis, and DockerFile, Apache w/ SSL enabled (and self signed certs)

Build container like this: 
	 docker build -t zzz .

Run container like this:
	docker run -p 5000:443 zzz


Example requests:

curl --cacert laravel/localhost.crt  -X POST -H "Content-Type: application/json" -d'{"message": "foo"}' https://localhost:5000/messages
curl --cacert laravel/localhost.crt   https://localhost:5000/messages/2c26b46b68ffc68ff99b453c1d30413413422d706483bfa0f98a5e886266e7ae
