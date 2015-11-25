# [how many nodes][how many tests][how many rolls][ftp password][file to upload 1][file to upload 2][file to upload 3...]
python clusterTwoDiceRollSum.py $1 $2 $3 | tee stats.txt
echo "Uploading results..."
python uploader.py $4 $5 $6