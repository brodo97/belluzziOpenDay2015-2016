# argv: [how many tests][how many needles]
python clusterBuffon.py $1 $2 | tee pi/stats.txt
echo "Uploading results..."
python uploader.py pi
