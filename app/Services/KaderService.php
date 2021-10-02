<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\PasswordCreated;
use App\Repositories\KaderRepositoryInterface;

class KaderService
{
    protected $kaderRepository;

    public function __construct(KaderRepositoryInterface $kaderRepository)
    {
        $this->kaderRepository = $kaderRepository;
    }

    /**
     * Save Kader
     *
     * @param [type] $request
     * @return void
     */
    public function save(array $request)
    {
        // SAVE DATA
        $kader = $this->kaderRepository->save($request);

        // SET ROLE
        $this->setKaderRole($kader);

        // SEND RESET PASSWORD EMAIL
        $this->sendKaderEmail($kader);
        
        return $kader;
    }

    /**
     * Update Kader
     *
     * @param [type] $request
     * @param [type] $id
     * @return void
     */
    public function update(array $request, $id)
    {
        $kader = $this->kaderRepository->update($request, $id);
        
        return $kader;
    }

    /**
     * Delete Kader
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        return $this->kaderRepository->delete($id);
    }

    /**
     * Set Role Kader
     *
     * @param [type] $kader
     * @return void
     */
    public function setKaderRole($kader)
    {
        return $kader->assignRole('kader');
    }

    /**
     * Send Kader Email
     * Reset Password Link
     * 
     * @param [type] $kader
     * @return void
     */
    public function sendKaderEmail(User $kader)
    {
        $token = $this->getTokenKader($kader);

        // return $kader->sendPasswordResetNotification($token);

        return 
            $kader->notify((new PasswordCreated($kader, $token))
                ->delay(now()->addMinutes(3)
            ));
    }

    /**
     * Get Token
     * For Kader Email Reset Password
     *
     * @param [type] $kader
     * @return void
     */
    public function getTokenKader(User $kader)
    {
        return  app('auth.password.broker')->createToken($kader);
    }
}
