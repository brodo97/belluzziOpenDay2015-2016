# [how many nodes][how many tests][how many rolls][ftp password][file to upload 1][file to upload 2][file to upload 3...]
python clusterCollatz.py $1 $2 $3 | tee collatz/stats.txt
echo "Uploading results..."
python uploader.py collatz
