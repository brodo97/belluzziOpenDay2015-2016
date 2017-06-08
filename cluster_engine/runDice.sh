# argv: [how many tests][how many rolls]
python clusterTwoDiceRollSum.py $1 $2 | tee dice/stats.txt
echo "Uploading results..."
python uploader.py dice
