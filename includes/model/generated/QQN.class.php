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
		 * @return QQNodeOffer
		 */
		static public function Offer() {
			return new QQNodeOffer('offer', null, null);
		}
		/**
		 * @return QQNodeOrganizationtype
		 */
		static public function Organizationtype() {
			return new QQNodeOrganizationtype('organizationtype', null, null);
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