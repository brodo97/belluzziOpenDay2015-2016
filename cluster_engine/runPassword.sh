# argv: [jobs multiplier][password length]
python clusterPassword.py $1 $2 | tee secure/stats.txt
echo "Uploading results..."
