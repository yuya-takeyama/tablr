guard 'phpunit', :cli => '--colors' do
  watch(%r{^.+Test\.php$})
  watch(%r{src/(.*).php$}) {|m| "tests/#{m[1]}Test.php" }
end
