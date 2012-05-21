class Member < ActiveRecord::Base
  has_many :bags

  validates :first, presence: true
  validates :last, presence: true
end
