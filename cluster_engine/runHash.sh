# argv: [word lenght][packet size]
python clusterHash.py $1 $2 | tee hash/stats.txt
echo "Uploading results..."
python uploader.py hash
