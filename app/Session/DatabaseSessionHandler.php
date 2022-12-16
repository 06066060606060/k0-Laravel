<?php
namespace App\Session;
use Illuminate\Support\Facades\Log;  //use
class DatabaseSessionHandler extends \Illuminate\Session\DatabaseSessionHandler

{
   /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function write($sessionId, $data): bool
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput(); 
        $out->writeln($data); 
        $user_id = (backpack_auth()->check()) ? backpack_auth()->user()->id : null;
      
        if ($this->exists) {
            $this->getQuery()->where('id', $sessionId)->update([
                'payload' => base64_encode($data), 'last_activity' => time(), 'user_id' => $user_id,
            ]);
        } else {
            $this->getQuery()->insert([
                'id' => $sessionId, 'ip_address' => 'ipaddress', 'user_agent' => 'useragent', 'payload' => base64_encode($data), 'last_activity' => time(), 'user_id' => $user_id,
            ]);
        }

       return $this->exists = true;
        
    }

}
