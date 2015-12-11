# [how many nodes][how many tests][how many rolls]
python clusterTwoDiceRollSum.py $1 $2 $3 | tee stats.txt
echo "Uploading results..."
python uploader.py