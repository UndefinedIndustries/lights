
#!/bin/bash
workdir=/home/pi/proj
echo 'running the light script...'
while [ true ]; do
timeon=$(mysql -h 192.168.1.143 -u root -proot -s -N -e 'SELECT `On` FROM Lighting.Time')
timeoff=$(mysql -h 192.168.1.143 -u root -proot -s -N -e 'SELECT `Off` FROM Lighting.Time')
systime=$(date +%H%M)
echo $systime
echo "Time off: "$timeoff
echo "Time on: "$timeon
if [ "1400" -ge "0900" ]; then
echo "Math is working today."
else
echo "Math is not working today."
fi
if [ $systime -ge "$timeon" ] && [ $systime -le "$timeoff" ] || [ $systime -ge "$timeon" ]; then
   echo 'Turned on the lights 1'
   $workdir/on.py
elif [ $systime -ge "$timeoff" ]; then
  $workdir/off.py
fi
sleep 60
done

