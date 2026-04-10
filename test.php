<?php
// 1. Import our function to test
require_once 'backend/functions.php';

echo "Running Unit Tests...\n";

// 2. Setup (Fake Data)
$test_label = "Unit Test Task";
$test_desc = "Testing 1 2 3";
$test_file_path = 'data/test_tasks.json'; // IMPORTANT: Use a fake file name so we don't ruin our real data!

// 3. Execution (Run the function)
save_task($test_label, $test_desc, $test_file_path);

// 4. ASSERTIONS (The actual test!)
// Try to write PHP code that checks two things:
// A. Does $test_file_path exist now?
if(file_exists($test_file_path)){
    echo"File creation/existence PASSED ✅ \n";
}else{
    echo "File creation/existence Failed ❌\n";
}
// B. If you read the file and decode it, does the first task's label equal "Unit Test Task"?
if(json_decode( file_get_contents($test_file_path))[0]->label == "Unit Test Task"){
    echo"First task label test PASSED ✅\n";
}else{
    echo "First task label test Failed ❌\n";
}
// 5. Cleanup (Leave no trace behind)
if (file_exists($test_file_path)) {
    unlink($test_file_path); // This deletes the dummy file!
}