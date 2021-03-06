<?php
class ModelVendorLtsSubscription extends Model {
	public function addVendorPlan($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "lts_vendor_plan SET vendor_id = '". (int)$this->customer->getId() ."', subscription_id = '" . (int)$data['subscription_id'] . "', name = '". $this->db->escape($data['name']) ."', no_of_product = '". (int)$data['no_of_product'] ."', join_fee = '". $data['join_fee'] ."', subscription_fee = '". $data['subscription_fee'] ."', validity = '". (int)$data['validity'] ."', date_added = NOW(), date_expire = NOW()");
	}

	public function getSubscriptions() {
		$sql = "SELECT * FROM " . DB_PREFIX . "lts_vendor_subscription s LEFT JOIN " . DB_PREFIX . "lts_vendor_subscription_description sd ON (s.subscription_id = sd.subscription_id) WHERE sd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getSubscriptionDescription($subscription_id) {
 
	}

	public function getSubscription($subscription_id) {
		$sql = "SELECT * FROM " . DB_PREFIX . "lts_vendor_subscription s LEFT JOIN " . DB_PREFIX . "lts_vendor_subscription_description sd ON (s.subscription_id = sd.subscription_id) WHERE sd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND s.subscription_id = '". (int)$subscription_id ."'";

		$query = $this->db->query($sql);

		return $query->row;
	}
}


 



?>