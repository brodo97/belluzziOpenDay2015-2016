# argv: [jobs multiplier][start range][end range]
python clusterCollatz.py $1 $2 $3 | tee collatz/stats.txt
echo "Uploading results..."
python uploader.py collatz
