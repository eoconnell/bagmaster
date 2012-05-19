class CreateBags < ActiveRecord::Migration
  def change
    create_table :bags do |t|
      t.string :make
      t.string :color
      t.integer :member_id
      t.integer :slot_id

      t.timestamps
    end
  end
end
