namespace app\controllers;

use Exception;

class ExceptionController { 
    
    public function makeException() 
    {
        try 
        {
            if (true) 
            {
                throw new Exception("Exception message."); 
            }
        } 
        catch (Exception $e)  
        {
            echo "Caught"; 
        }
    }
}

$exceptionController = new ExceptionController();
$exceptionController->makeException();

//_