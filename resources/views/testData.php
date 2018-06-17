<html>
    <head>
        <title>hello</title>
    </head>
    <form action="/task" method="get">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />


        testData1: <input type="text" name="user_id" />
        testData2: <input type="text" name="title" />
        testData3: <input type="text" name="information" />
        testData4: <input type="text" name="educational_experience" />
        testData5: <input type="text" name="occupational_experience" />
        testData6: <input type="text" name="award_winning_experience" />
        testData7: <input type="text" name="field" />
        testData8: <input type="text" name="expert_name" />
        <input type="submit" value="Submit" />
    </form>
</html>