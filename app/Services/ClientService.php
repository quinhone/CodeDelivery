<?php
/**
 * Created by PhpStorm.
 * User: LuisCarlos
 * Date: 19/05/2016
 * Time: 15:48
 */

namespace CodeDelivery\Services;


use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{
	private $clientrepository;
	private $userrepository;

	public function __construct (ClientRepository $clientRepository, UserRepository $userRepository)
	{
		$this->clientrepository = $clientRepository;
		$this->userrepository = $userRepository;
	}

	public function update($data, $id)
	{
		$this->clientrepository->update($data, $id);
		$userId = $this->clientrepository->find($id, ['user_id'])->user_id;

		$this->userrepository->update($data['user'], $userId);
	}

	public function create($data)
	{
		$data['user']['password'] = bcrypt(12345);
		$user = $this->userrepository->create($data['user']);

		$data['user_id'] = $user->id;
		$this->clientrepository->create($data);

	}
}