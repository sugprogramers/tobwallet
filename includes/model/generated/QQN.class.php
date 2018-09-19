<?php
	class QQN {
		/**
		 * @return QQNodeAdministrator
		 */
		static public function Administrator() {
			return new QQNodeAdministrator('administrator', null, null);
		}
		/**
		 * @return QQNodeBalance
		 */
		static public function Balance() {
			return new QQNodeBalance('balance', null, null);
		}
		/**
		 * @return QQNodeClient
		 */
		static public function Client() {
			return new QQNodeClient('client', null, null);
		}
		/**
		 * @return QQNodeMessage
		 */
		static public function Message() {
			return new QQNodeMessage('message', null, null);
		}
		/**
		 * @return QQNodeOffer
		 */
		static public function Offer() {
			return new QQNodeOffer('offer', null, null);
		}
		/**
		 * @return QQNodeOrganization
		 */
		static public function Organization() {
			return new QQNodeOrganization('organization', null, null);
		}
		/**
		 * @return QQNodeOrganizationtype
		 */
		static public function Organizationtype() {
			return new QQNodeOrganizationtype('organizationtype', null, null);
		}
		/**
		 * @return QQNodeOwner
		 */
		static public function Owner() {
			return new QQNodeOwner('owner', null, null);
		}
		/**
		 * @return QQNodeRestaurant
		 */
		static public function Restaurant() {
			return new QQNodeRestaurant('restaurant', null, null);
		}
		/**
		 * @return QQNodeUser
		 */
		static public function User() {
			return new QQNodeUser('user', null, null);
		}
	}
?>