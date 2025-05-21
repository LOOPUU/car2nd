 <?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');

/**
 * Override for solve deprecated function
 * mcrypt_encrypt(), mcrypt_decrypt(), mcrypt_create_iv() 
 */
class MY_Encrypt extends CI_Encrypt 
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Encrypt using Mcrypt
     *
     * @param    string
     * @param    string
     * @return    string
     */
    public function mcrypt_encode($data, $key)
    {
        $init_size = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $init_vect = openssl_random_pseudo_bytes($init_size);
        return $this->_add_cipher_noise($init_vect . openssl_encrypt($data, $cipher, $key, $options=OPENSSL_RAW_DATA, $init_vect), $key);
    }

    // --------------------------------------------------------------------

    /**
     * Decrypt using Mcrypt
     *
     * @param    string
     * @param    string
     * @return    string
     */
    public function mcrypt_decode($data, $key)
    {
        $data = $this->_remove_cipher_noise($data, $key);
       
        $init_size = openssl_cipher_iv_length($cipher="AES-128-CBC");
       
        if ($init_size > self::strlen($data))
        {
            return FALSE;
        }

        $init_vect = self::substr($data, 0, $init_size);
        $data      = self::substr($data, $init_size);

        return rtrim(openssl_decrypt($data, $cipher, $key, $options=OPENSSL_RAW_DATA, $init_vect), "\0");
    }
   
    /**
     * Byte-safe strlen()
     *
     * @param    string    $str
     * @return    int
     */
    protected static function strlen($str)
    {
        return defined('MB_OVERLOAD_STRING')
            ? mb_strlen($str, '8bit')
            : strlen($str);
    }

    // --------------------------------------------------------------------

    /**
     * Byte-safe substr()
     *
     * @param    string    $str
     * @param    int    $start
     * @param    int    $length
     * @return    string
     */
    protected static function substr($str, $start, $length = NULL)
    {
        if (defined('MB_OVERLOAD_STRING'))
        {
            // mb_substr($str, $start, null, '8bit') returns an empty
            // string on PHP 5.3
            isset($length) OR $length = ($start >= 0 ? self::strlen($str) - $start : -$start);
            return mb_substr($str, $start, $length, '8bit');
        }

        return isset($length)
            ? substr($str, $start, $length)
            : substr($str, $start);
    }
}