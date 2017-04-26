<?php
/*
What is the recommended method of copying data between two opened files?

A.
copy($source_file, $destination_file);

B.
copy($destination_file, $source_file);

C.
stream_copy_to_stream($source_file, $destination_file);

D.
stream_copy_to_stream($destination_file, $source_file);

E.
stream_bucket_prepend($source_file, $destination_file);

Answer: C
stream_copy_to_stream($source_file, $destination_file);

*/

echo '15. What is the recommended method of copying data between two opened files?' . PHP_EOL;
echo 'stream_copy_to_stream($source_file, $destination_file);';
