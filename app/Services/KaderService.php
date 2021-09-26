<?php

namespace App\Services;

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
        $kader = $this->kaderRepository->save($request);

        $this->setKaderRole($kader);

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
    public function update($request, $id)
    {
        $kader = $this->kaderRepository->update($request->all(), $id);
        
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
    public function sendKaderEmail($kader)
    {
        $token = $this->getTokenKader($kader);

        return $kader->sendPasswordResetNotification($token);
    }

    /**
     * Get Token
     * For Kader Email Reset Password
     *
     * @param [type] $kader
     * @return void
     */
    public function getTokenKader($kader)
    {
        return app(Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($kader);
    }
}
