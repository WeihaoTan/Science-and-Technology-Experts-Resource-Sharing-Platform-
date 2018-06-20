<html>
    <head>
        <title>hello</title>
    </head>
    <form action="expert/dealApplyMessage" method="post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
        testData1: <input type="text" name="expert_id" />
        testData2: <input type="text" name="title" />
        testData3: <input type="text" name="information" />
        testData5: <input type="text" name="occupational_experience" />
        testData6: <input type="text" name="award_winning_experience" />
        testData7: <input type="text" name="field" />
        testData8: <input type="text" name="expert_name" />
        <input type="submit" value="Submit" />
    </form>
</html>