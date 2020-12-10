while [[ 1 == 1 ]]
do
	if [ -f "hostcomm.zip" ];then
		date=hostcomm_`date +%H%M%S%d%m%y`
		mkdir $date
		unzip hostcomm.zip -d $date
		if [ -f $date/dussoji*/00000000 ];then
			mv hostcomm hostcomm_before_$date
			mv $date/dussoji* hostcomm
		fi
		mv hostcomm.zip hostcomm_$date.zip
		rm -rf $date
	fi
	
	echo "going for sleep" `date` >> log
	sleep 60
	echo "Came out of sleep" `date` >> log
done
