<?php
/**
 * @package         PHP-Lib
 * Class MathsCaptcha
 * Class is used to generate a CAPTCHA based on mathematical operations like addition, multiplication, etc.
 *
 * @copyright       Copyright (c) 2013, Peeyush Budhia
 * @author          Peeyush Budhia <peeyush.budhia@gmail.com>
 */
class MathsCaptcha
{
    /**
     * @author          Peeyush Budhia <peeyush.budhia@gmail.com>
     * Function __construct
     *          The function is used to start a new session or to carry forward the old session
     */
    function __construct()
    {
        session_start();
    }

    /**
     * @author          Peeyush Budhia <peeyush.budhia@gmail.com>
     * Function generateCaptcha
     *          The function is used to generate the CAPTCHA Image
     * @return Image Data
     *
     */
    function generateCaptcha()
    {
        $_SESSION['first'] = rand(1, 9);
        $_SESSION['second'] = rand(1, 9);
        $operators = array('+', '-', '*',);
        $indexOperator = array_rand($operators);
        $_SESSION['operator'] = $operators[$indexOperator];
        $captchaString = $_SESSION['first'] . $_SESSION['operator'] . $_SESSION['second'];
        $image = imagecreate(60, 40);

        imagecolorallocate($image, 255, 255, 255);

        $colors = array
        (
            imagecolorallocate($image, 255, 204, 51),
            imagecolorallocate($image, 51, 102, 255),
            imagecolorallocate($image, 255, 61, 81),
            imagecolorallocate($image, 255, 153, 102),

        );

        $fonts = array
        (
            'fonts/Bradley.ttf',
            'fonts/Kalaam.ttf',
        );

        $fgColor = array_rand($colors);
        $lineColor = array_rand($colors);
        $textFont = array_rand($fonts);

        imagettftext($image, 20, 0, 5, 30, $colors[$fgColor], $fonts[$textFont], $captchaString);
        //imagettftext()
        return imagejpeg($image, null, 100);
    }

    /**
     * @author          Peeyush Budhia <peeyush.budhia@gmail.com>
     * Function isValid
     *          The function is used to check the value entered by user matches the CAPTCHA value or not
     * @param $formValue
     *          The parameter is used to accept the value from the user
     * @return bool
     *          "true" if the value entered by user matches with the CAPTCHA value
     *          "false" if the value entered by user does not matches with the CAPTCHA value
     */

    function isValid($formValue)
    {
        if (($_SESSION['first'] == null) || ($_SESSION['second'] == null) || ($_SESSION['operator'] == null)) {
            return false;
        } else {
            switch ($_SESSION['operator']) {
                case '+':
                    $result = $_SESSION['first'] + $_SESSION['second'];
                    break;
                case '-':
                    $result = $_SESSION['first'] - $_SESSION['second'];
                    break;
                case '*':
                    $result = $_SESSION['first'] * $_SESSION['second'];
                    break;
            }

            if ($formValue == $result) {
                return true;
            } else {
                return false;
            }
        }
    }
}
