# LEO1 PF2 - Bjarke Larsen (blars16) and Jens Beltman Jørgensen (jensj16)

<details><summary>Result</summary>
  ![LEO1_PF2_1](LEO1_PF2/LEO1_PF2_1.png?raw=true)
  ![LEO1_PF2_2](LEO1_PF2/LEO1_PF2_2.png?raw=true)
</details>

## Setup of the containers
Setup of the bridge and the containers was done following the guides given in the slides for pf2.
The containers were created with the names cntnr1 and cntnr2.

## Start of the containers
The script pf2Start.sh is used to start the containers. It stops the lighttpd server already running on the pi and then starts the two containers.
The script also enables DNAT for cntnr1 as they are set to have static ip's.

## cntnr2
* cntnr2 has the script for random numbers given in the slides placed in */bin*.

The command for running the rng.sh script with socat was placed in pf2.start and made executable and placed in */etc/local.d/* to automatically run the command on start of the container.
* Following commands were required to make it start on boot.
```
rc-update add local default
openrc
```

## cntnr1
* index.php was placed in */var/www/localhost/htdocs/*.

index.php delivers all the styling and formatting of the page.

## getNumbers.php
* getNumbers.php was placed in */var/www/localhost/htdocs/*.

getNumbers.php fetches the numbers from the server using the method given in the slides.
It is necessary to install php-json to get the numbers from getNumbers.php to index.php.

The php code was split into a seperate file to be able to refresh the numbers from the index file with javascript.

## snow.css
* snow.css was placed in */var/www/localhost/htdocs/*.

snow.css was added for christmas spirit and general embellishment.

## Additional comments
* Only requirement to make the page available through the browser is to run pf2Start.sh given that it successfully sets the static ip's.

* urandom was used in the rng.sh script instead because random stopped working when running it multiple times in a row.

* The delay in the pf2Start script was because static ips sometimes doesn't work and the thought was to make sure lighttpd was stopped first but it doesn't seem to make a difference as it still sometimes works and sometimes don't.
