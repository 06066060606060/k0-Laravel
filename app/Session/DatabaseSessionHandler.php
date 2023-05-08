<?php
namespace App\Session;

class DatabaseSessionHandler extends \Illuminate\Session\DatabaseSessionHandler

{
   /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function write($sessionId, $data): bool
    {
        // On récupère l'ID de l'utilisateur connecté ou null s'il n'y en a pas.
        $user_id = (backpack_auth()->check()) ? backpack_auth()->user()->id : null;
      
        if ($this->exists()) {
            // Si la session existe, on met à jour les informations de celle-ci.
            $this->getQuery()->where('id', $sessionId)->update([
                'payload' => base64_encode($data),
                'last_activity' => time(),
                'user_id' => $user_id,
            ]);
        } else {
            // Sinon, on crée une nouvelle session.
            $this->getQuery()->insert([
                'id' => $sessionId,
                'ip_address' => 'adresseIP',
                'user_agent' => 'agentUtilisateur',
                'payload' => base64_encode($data),
                'last_activity' => time(),
                'user_id' => $user_id,
            ]);
        }
    
        // On retourne true pour indiquer que la session existe.
        return $this->exists() = true;
    }
}
