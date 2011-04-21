/*
Navicat SQLite Data Transfer

Source Server         : SQLcraft-dev
Source Server Version : 30623
Source Host           : localhost:0

Target Server Type    : SQLite
Target Server Version : 30623
File Encoding         : 65001

Date: 2011-04-03 19:00:03
*/

PRAGMA foreign_keys = OFF;

-- ----------------------------
-- Table structure for "main"."configuration"
-- ----------------------------
DROP TABLE "main"."configuration";
CREATE TABLE "configuration" (
"id"  TEXT,
"value"  TEXT,
PRIMARY KEY ("id")
);

-- ----------------------------
-- Records of configuration
-- ----------------------------
INSERT INTO ""."configuration" VALUES ('mysql_host', 'localhost');
INSERT INTO ""."configuration" VALUES ('mysql_user', 'root');
INSERT INTO ""."configuration" VALUES ('mysql_pass', 'derp');
INSERT INTO ""."configuration" VALUES ('mysql_db', 'sqlcraft');
INSERT INTO ""."configuration" VALUES ('path_wr', 'http://localhost/SQLcraft/');
INSERT INTO ""."configuration" VALUES ('path_fs', 'C:\Users\jekotia\My Dropbox\GitHub\SQLcraft\');
INSERT INTO ""."configuration" VALUES ('path_mc', 'C:\SQLcraft\');
INSERT INTO ""."configuration" VALUES ('sc_auth', 1);
INSERT INTO ""."configuration" VALUES ('sc_local', 0);
INSERT INTO ""."configuration" VALUES ('sc_linux', 0);
INSERT INTO ""."configuration" VALUES ('sc_screen', 'mcserver');
INSERT INTO ""."configuration" VALUES ('cn_user', 'sqlcraft_user');
INSERT INTO ""."configuration" VALUES ('cn_token', 'sqlcraft_token');

-- ----------------------------
-- Table structure for "main"."groups"
-- ----------------------------
DROP TABLE "main"."groups";
CREATE TABLE "groups" (
"gid"  INTEGER NOT NULL,
"name"  TEXT(32),
PRIMARY KEY ("gid" ASC)
);

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO ""."groups" VALUES (0, 'system');
INSERT INTO ""."groups" VALUES (1, 'owner');
INSERT INTO ""."groups" VALUES (2, 'admin');
INSERT INTO ""."groups" VALUES (3, 'mod');

-- ----------------------------
-- Table structure for "main"."notes"
-- ----------------------------
DROP TABLE "main"."notes";
CREATE TABLE "notes" (
"nid"  INTEGER NOT NULL,
"content"  BLOB,
PRIMARY KEY ("nid")
);

-- ----------------------------
-- Records of notes
-- ----------------------------
INSERT INTO ""."notes" VALUES (0, null);
INSERT INTO ""."notes" VALUES (1, null);
INSERT INTO ""."notes" VALUES (2, null);
INSERT INTO ""."notes" VALUES (3, null);

-- ----------------------------
-- Table structure for "main"."sqlite_sequence"
-- ----------------------------
DROP TABLE "main"."sqlite_sequence";
CREATE TABLE sqlite_sequence(name,seq);

-- ----------------------------
-- Records of sqlite_sequence
-- ----------------------------
INSERT INTO ""."sqlite_sequence" VALUES ('users', 1);
INSERT INTO ""."sqlite_sequence" VALUES ('_groups_old_20110403', 3);

-- ----------------------------
-- Table structure for "main"."users"
-- ----------------------------
DROP TABLE "main"."users";
CREATE TABLE "users" (
"uid"  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"username"  TEXT(32) NOT NULL,
"password"  TEXT(64) NOT NULL,
"token"  TEXT(64) NOT NULL,
"gid"  INTEGER
);

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO ""."users" VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'eae54e7450bb6f41a8df6023a33caaa8d2a8ec9269f8036247114ad2048547cb', 1);

-- ----------------------------
-- Table structure for "main"."_groups_old_20110403"
-- ----------------------------
DROP TABLE "main"."_groups_old_20110403";
CREATE TABLE "_groups_old_20110403" (
"gid"  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"name"  TEXT(32)
);

-- ----------------------------
-- Records of _groups_old_20110403
-- ----------------------------
INSERT INTO ""."_groups_old_20110403" VALUES (0, 'system');
INSERT INTO ""."_groups_old_20110403" VALUES (1, 'owner');
INSERT INTO ""."_groups_old_20110403" VALUES (2, 'admin');
INSERT INTO ""."_groups_old_20110403" VALUES (3, 'mod');
