<html>
    <head>
        <title>hello</title>
    </head>
    <form action="/task" method="get">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
        testData1: <input type="text" name="expert_id" />
        testData2: <input type="text" name="institution" />
        testData3: <input type="text" name="title" />
        testData5: <input type="text" name="occupational_experience" />
        testData6: <input type="text" name="award_winning_experience" />
        testData7: <input type="text" name="field" />
        testData8: <input type="text" name="expert_name" />
        testData9: <input type="text" name="user_id" />
        <input type="submit" value="Submit" />
    </form>
</html>