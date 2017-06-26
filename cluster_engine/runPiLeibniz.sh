# argv: [how many tests][how many sums]
python clusterLeibniz.py $1 $2 | tee pi/stats.txt
echo "Uploading results..."
python uploader.py pi
