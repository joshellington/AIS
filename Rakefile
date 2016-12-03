ssh_user = "do-1" # for rsync deployment
remote_root = "/var/www/adventuresinspace.com/html/wp/wp-content/themes/ais/" # for rsync deployment

task :deploy do
  system("rsync --exclude-from=rsync.exclude -rcv . #{ssh_user}:#{remote_root}")
end

task :fake do
  system("rsync --exclude-from=rsync.exclude -rcvn . #{ssh_user}:#{remote_root}")
end

task :fakepull do
  system("rsync --exclude-from=rsync.exclude -rcvn #{ssh_user}:#{remote_root} .")
end

task :pull do
  system("rsync --exclude-from=rsync.exclude -rcv #{ssh_user}:#{remote_root} .")
end
